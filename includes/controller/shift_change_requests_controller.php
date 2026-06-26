<?php

use Engelsystem\Models\Shifts\ShiftChangeRequest;

/**
 * helfisystem: Admin-Seite fuer Austrage-/Umtrage-Antraege (Freigeben/Ablehnen).
 */

function shift_change_requests_title(): string
{
    return __('shift_change.admin_title');
}

function shift_change_requests_controller(): array
{
    if (!auth()->can('user_shifts_admin')) {
        throw_redirect(url('/'));
    }

    $request = request();

    if ($request->hasPostData('submit')) {
        $id = (int) $request->postData('id');
        $action = $request->postData('action');
        /** @var ShiftChangeRequest|null $req */
        $req = ShiftChangeRequest::find($id);

        if ($req && $req->status === ShiftChangeRequest::PENDING) {
            if ($action === 'approve') {
                $entry = $req->shiftEntry;
                if ($entry) {
                    ShiftEntry_onDelete($entry);
                    $entry->delete();
                }
                $req->status = ShiftChangeRequest::APPROVED;
                $req->decided_by = auth()->user()->id;
                $req->save();
                engelsystem_log('Shift change request #' . $req->id . ' approved');
                success(__('shift_change.approved'));
            } elseif ($action === 'reject') {
                $req->status = ShiftChangeRequest::REJECTED;
                $req->decided_by = auth()->user()->id;
                $req->save();
                engelsystem_log('Shift change request #' . $req->id . ' rejected');
                success(__('shift_change.rejected'));
            }
        }
        throw_redirect(url('/shift-change-requests'));
    }

    /** @var ShiftChangeRequest[] $requests */
    $requests = ShiftChangeRequest::with(['user', 'shift', 'shift.shiftType', 'shift.location'])
        ->where('status', ShiftChangeRequest::PENDING)
        ->orderBy('created_at')
        ->get();

    $rows = '';
    foreach ($requests as $req) {
        $shift = $req->shift;
        $shiftLabel = $shift
            ? htmlspecialchars($shift->shiftType->name . ' – ' . $shift->title) . '<br>'
                . $shift->start->format(__('general.datetime')) . ' – ' . $shift->end->format(__('general.datetime'))
                . '<br><small>' . htmlspecialchars($shift->location->name) . '</small>'
            : '<em>?</em>';

        $approve = '<form method="post" action="' . url('/shift-change-requests') . '" class="d-inline">'
            . form_csrf()
            . '<input type="hidden" name="id" value="' . $req->id . '">'
            . '<input type="hidden" name="action" value="approve">'
            . '<button type="submit" name="submit" value="1" class="btn btn-sm btn-success">'
            . __('shift_change.approve') . '</button></form>';
        $reject = ' <form method="post" action="' . url('/shift-change-requests') . '" class="d-inline">'
            . form_csrf()
            . '<input type="hidden" name="id" value="' . $req->id . '">'
            . '<input type="hidden" name="action" value="reject">'
            . '<button type="submit" name="submit" value="1" class="btn btn-sm btn-danger">'
            . __('shift_change.reject') . '</button></form>';

        $rows .= '<tr>'
            . '<td>' . User_Nick_render($req->user) . '</td>'
            . '<td>' . $shiftLabel . '</td>'
            . '<td>' . nl2br(htmlspecialchars($req->reason)) . '</td>'
            . '<td>' . $req->created_at->format(__('general.datetime')) . '</td>'
            . '<td class="text-nowrap">' . $approve . $reject . '</td>'
            . '</tr>' . "\n";
    }

    if ($rows === '') {
        $content = info(__('shift_change.none_pending'), true);
    } else {
        $content = '<table class="table table-striped"><thead><tr>'
            . '<th>' . __('general.nick') . '</th>'
            . '<th>' . __('shift_change.shift') . '</th>'
            . '<th>' . __('shift_change.reason') . '</th>'
            . '<th>' . __('shift_change.requested_at') . '</th>'
            . '<th>' . __('form.actions') . '</th>'
            . '</tr></thead><tbody>' . $rows . '</tbody></table>';
    }

    return [shift_change_requests_title(), $content];
}
