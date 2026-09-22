<?php

use Engelsystem\Config\GoodieType;
use Engelsystem\Http\Validation\Rules\Username;
use Engelsystem\Models\Group;
use Engelsystem\Models\PretixVoucher;
use Engelsystem\Models\User\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;

/**
 * @return string
 */
function admin_user_title()
{
    return __('All Angels');
}

/**
 * @return string
 */
function admin_user()
{
    $user = auth()->user();
    $tshirt_sizes = config('tshirt_sizes');
    $request = request();
    $html = '';
    $goodie = GoodieType::from(config('goodie_type'));
    $goodie_enabled = $goodie !== GoodieType::None;
    $goodie_tshirt = $goodie === GoodieType::Tshirt;
    $user_info_edit = auth()->can('user.info.edit');
    $user_goodie_edit = auth()->can('user.goodie.edit');
    $user_nick_edit = auth()->can('user.nick.edit');
    $pretix_edit = auth()->can('pretix.edit');

    if (!$request->has('id')) {
        throw_redirect(users_link());
    }

    $user_id = $request->input('id');
    if (!$request->has('action')) {
        $user_source = User::find($user_id);
        if (!$user_source) {
            error(__('This user does not exist.'));
            throw_redirect(users_link());
        }

        $html .= __('Here you can change the user entry.');
        if ($goodie_enabled && $user_goodie_edit) {
            $html .= ' ' . __('If the angel is active, it can claim a goodie. If goodie is set to \'Yes\', the angel already got their goodie.');
        }
        $html .= '<br><br>';
        $html .= '<form action="'
            . url('/admin-user', ['action' => 'save', 'id' => $user_id])
            . '" method="post">' . "\n";
        $html .= form_csrf();
        $html .= '<table>' . "\n";
        $html .= '<input type="hidden" name="Type" value="Normal">' . "\n";
        $html .= '<tr><td>' . "\n";
        $html .= '<table>' . "\n";
        $html .= '  <tr><td>' . __('general.nick') . '</td><td>'
            . '<input size="40" name="nick" value="' . htmlspecialchars($user_source->name)
            . '" class="form-control" maxlength="24" ' . ($user_nick_edit ? '' : 'disabled') . '>'
            . '</td></tr>' . "\n";
        $html .= '  <tr><td>' . __('Last login') . '</td><td><p class="help-block">'
            . ($user_source->last_login_at ? $user_source->last_login_at->format(__('general.datetime')) : '-')
            . '</p></td></tr>' . "\n";
        if (config('enable_full_name')) {
            $html .= '  <tr><td>' . __('settings.profile.firstname') . '</td><td>'
                . '<input size="40" name="first_name" value="' . htmlspecialchars((string) $user_source->personalData->first_name) . '" class="form-control" maxlength="64">'
                . '</td></tr>' . "\n";
            $html .= '  <tr><td>' . __('settings.profile.lastname') . '</td><td>'
                . '<input size="40" name="last_name" value="' . htmlspecialchars((string) $user_source->personalData->last_name) . '" class="form-control" maxlength="64">'
                . '</td></tr>' . "\n";
        }
        $html .= '  <tr><td>' . __('settings.profile.mobile') . '</td><td>'
            . '<input type= "tel" size="40" name="mobile" value="' . htmlspecialchars((string) $user_source->contact->mobile) . '" class="form-control" maxlength="40">'
            . '</td></tr>' . "\n";
        if (config('enable_dect')) {
            $html .= '  <tr><td>' . __('general.dect') . '</td><td>'
                . '<input size="40" name="dect" value="' . htmlspecialchars((string) $user_source->contact->dect) . '" class="form-control" maxlength="40">'
                . '</td></tr>' . "\n";
        }
        if ($user_source->settings->email_human) {
            $html .= '  <tr><td>' . __('general.email') . '</td><td>'
                . '<input type="email" size="40" name="mail" value="' . htmlspecialchars($user_source->email) . '" class="form-control" maxlength="254">'
                . '</td></tr>' . "\n";
        }
        if ($goodie_tshirt && $user_goodie_edit) {
            $html .= '  <tr><td>' . __('user.shirt_size') . '</td><td>'
                . html_select_key(
                    'size',
                    'shirt_size',
                    $tshirt_sizes,
                    $user_source->personalData->shirt_size,
                    __('form.select_placeholder')
                )
                . '</td></tr>' . "\n";
        }

        // User info
        if ($user_info_edit) {
            $html .= '  <tr><td>'
            . __('user.info')
            . ' <span class="bi bi-info-circle-fill text-info" data-bs-toggle="tooltip" title="'
            . __('user.info.hint')
            . '"></span>'
            . '</td><td>'
            . '<textarea cols="40" rows="" name="userInfo" class="form-control">'
            . htmlspecialchars((string) $user_source->state->user_info)
            . '</textarea>'
            . '</td></tr>' . "\n";
        }

        $options = [
            '1' => __('Yes'),
            '0' => __('No'),
        ];

        // Forced active?
        if (config('enable_force_active')) {
            $html .= '  <tr><td>' . __('Force active') . '</td><td>' . "\n";
            $html .= auth()->can('user.fa.edit')
                ? html_options('force_active', $options, $user_source->state->force_active)
                : icon_bool($user_source->state->force_active);
            $html .= '</td></tr>' . "\n";
        }

        // Forced food?
        if (config('enable_force_food')) {
            $html .= '  <tr><td>' . __('Force food') . '</td><td>' . "\n";
            $html .= auth()->can('user.ff.edit')
                ? html_options('force_food', $options, $user_source->state->force_food)
                : icon_bool($user_source->state->force_food);
            $html .= '</td></tr>' . "\n";
        }

        if ($goodie_enabled) {
            // got goodie?
            $html .= '  <tr><td>'
                . __('Goodie')
                . '</td><td>' . "\n";
            $html .= $user_goodie_edit
                ? html_options('goodie', $options, $user_source->state->got_goodie)
                : icon_bool($user_source->state->got_goodie);
            $html .= '</td></tr>' . "\n";
        }

        // helfisystem: Erstattung ausbezahlt?
        if ($user_goodie_edit) {
            $html .= '  <tr><td>' . __('Has been paid') . '</td><td>' . "\n";
            $html .= html_options('has_payday', $options, (int) $user_source->personalData->has_payday);
            $html .= '</td></tr>' . "\n";
        }

        $html .= '</table>' . "\n" . '</td><td></td></tr>';

        $html .= '</td></tr>' . "\n";
        $html .= '</table>' . "\n" . '<br>' . "\n";
        $html .= '<button type="submit" class="btn btn-primary">'
            . icon('save') . __('form.save') . '</button>' . "\n";
        $html .= '</form>';

        $html .= '<hr>';

        $html .= __('Here you can reset the password of this angel:');

        $html .= '<form action="'
            . url('/admin-user', ['action' => 'change_pw', 'id' => $user_id])
            . '" method="post">' . "\n";
        $html .= form_csrf();
        $html .= '<table>' . "\n";
        $html .= '  <tr><td>' . __('settings.password')
            . ' <span class="bi bi-info-circle-fill text-info" data-bs-toggle="tooltip" title="'
            . __('password.minimal_length', [config('password_min_length')]) . '"></span>'
            . '</td><td>'
            . '<input type="password" size="40" name="new_pw" value="" class="form-control" autocomplete="new-password">'
            . '</td></tr>' . "\n";
        $html .= '  <tr><td>' . __('password.reset.confirm') . '</td><td>'
            . '<input type="password" size="40" name="new_pw2" value="" class="form-control" autocomplete="new-password">'
            . '</td></tr>' . "\n";

        $html .= '</table>' . "\n" . '<br>' . "\n";
        $html .= '<button type="submit" class="btn btn-primary">'
            . icon('save') . __('form.save') . '</button>' . "\n";
        $html .= '</form>';

        $html .= '<hr>';

        // helfisystem: Admin-Ausnahme - manuelle Voucher-Zuweisung fuer Sonderfaelle
        // Auf-/Zuklappen bewusst per CSS (:checked ~ Sibling), da die CSP kein
        // inline onclick erlaubt (kein 'unsafe-inline' im script-src).
        if ($pretix_edit) {
            $html .= '<style>#voucher-exception-toggle:checked ~ #voucher-exception-panel '
                . '{ display: block !important; }</style>';
            // checkbox, label und panel muessen direkte Geschwister sein (kein wrapping div
            // um die checkbox), sonst greift der CSS-Sibling-Selektor nicht
            $html .= '<input class="form-check-input" type="checkbox" id="voucher-exception-toggle" '
                . 'style="margin-right:6px;">'
                . '<label class="form-check-label mb-2" for="voucher-exception-toggle">'
                . __('day_ticket_deal.admin.exception.checkbox')
                . '</label>';

            $html .= '<div id="voucher-exception-panel" style="display:none;">';
            $html .= '<div class="alert alert-info">' . __('day_ticket_deal.admin.exception.info') . '</div>';

            $html .= '<form action="'
                . url('/admin-user', ['action' => 'assign_voucher_exception', 'id' => $user_id])
                . '" method="post">' . "\n";
            $html .= form_csrf();

            $poolOptions = [
                PretixVoucher::POOL_FULL => PretixVoucher::poolLabel(PretixVoucher::POOL_FULL),
                PretixVoucher::POOL_DAY_FRI => PretixVoucher::poolLabel(PretixVoucher::POOL_DAY_FRI),
                PretixVoucher::POOL_DAY_SAT => PretixVoucher::poolLabel(PretixVoucher::POOL_DAY_SAT),
                PretixVoucher::POOL_DAY_SUN => PretixVoucher::poolLabel(PretixVoucher::POOL_DAY_SUN),
            ];

            $html .= '<table>' . "\n";
            $html .= '  <tr><td>' . __('day_ticket_deal.admin.exception.voucher1') . '</td><td>'
                . html_select_key('pool1', 'pool1', $poolOptions, '', __('form.select_placeholder'))
                . '</td></tr>' . "\n";
            $html .= '  <tr><td>' . __('day_ticket_deal.admin.exception.voucher2') . '</td><td>'
                . html_select_key('pool2', 'pool2', $poolOptions, '', __('form.select_placeholder'))
                . '</td></tr>' . "\n";
            $html .= '  <tr><td>' . __('day_ticket_deal.admin.exception.refund_hours') . '</td><td>'
                . '<input type="number" step="0.5" min="0" size="10" name="refund_hours" '
                . 'value="' . htmlspecialchars((string) ($user_source->personalData->refund_hours_override ?? ''))
                . '" class="form-control" placeholder="' . htmlspecialchars((string) config('pretix_refund_min_hours', 0)) . '">'
                . '<div class="form-text">' . __('day_ticket_deal.admin.exception.refund_hours.info') . '</div>'
                . '</td></tr>' . "\n";
            $html .= '  <tr><td>' . __('day_ticket_deal.admin.exception.reason') . '</td><td>'
                . '<input size="40" name="reason" class="form-control" maxlength="255">'
                . '</td></tr>' . "\n";
            $html .= '</table>' . "\n" . '<br>' . "\n";

            $html .= '<button type="submit" class="btn btn-warning">'
                . icon('ticket-perforated') . ' ' . __('day_ticket_deal.admin.exception.submit') . '</button>' . "\n";
            $html .= '</form>';
            $html .= '</div>';

            $html .= '<hr>';
        }

        /** @var Group $my_highest_group */
        $my_highest_group = $user->groups()->orderByDesc('id')->first();
        if (!empty($my_highest_group)) {
            $my_highest_group = $my_highest_group->id;
        }

        $angel_highest_group = $user_source->groups()->orderByDesc('id')->first();
        if (!empty($angel_highest_group)) {
            $angel_highest_group = $angel_highest_group->id;
        }

        if (
            ($user_id != $user->id || auth()->can('admin_groups'))
            && ($my_highest_group >= $angel_highest_group || is_null($angel_highest_group))
        ) {
            $html .= __('Here you can define the user groups of the angel:') . '<form action="'
                . url('/admin-user', ['action' => 'save_groups', 'id' => $user_id])
                . '" method="post">' . "\n";
            $html .= form_csrf();
            $html .= '<div>';

            $groups = changeableGroups($my_highest_group, $user_id);
            foreach ($groups as $group) {
                $html .= '<div class="form-check">'
                    . '<input class="form-check-input" type="checkbox" id="' . $group->id . '" name="groups[]" value="' . $group->id . '" '
                    . ($group->selected ? ' checked="checked"' : '')
                    . ' /><label class="form-check-label" for="' . $group->id . '">'
                    . htmlspecialchars($group->name)
                    . '</label></div>';
            }

            $html .= '</div><br>';

            $html .= '<button type="submit" class="btn btn-primary">'
                . icon('save') . __('form.save') . '</button>' . "\n";
            $html .= '</form>';

            $html .= '<hr>';
        }

        $html .= buttons([
            button(user_delete_link($user_source->id), icon('trash') . __('form.delete'), 'btn-danger'),
        ]);

        $html .= '<hr>';
    } else {
        switch ($request->input('action')) {
            case 'save_groups':
                /** @var User $angel */
                $angel = User::findOrFail($user_id);
                if ($angel->id != $user->id || auth()->can('admin_groups')) {
                    /** @var Group $my_highest_group */
                    $my_highest_group = $user->groups()->orderByDesc('id')->first();
                    /** @var Group $angel_highest_group */
                    $angel_highest_group = $angel->groups()->orderByDesc('id')->first();

                    if (
                        $my_highest_group
                        && (
                            empty($angel_highest_group)
                            || ($my_highest_group->id >= $angel_highest_group->id)
                        )
                    ) {
                        $groups_source = changeableGroups($my_highest_group->id, $angel->id);
                        $groups = [];
                        $groupList = [];
                        foreach ($groups_source as $group) {
                            $groups[$group->id] = $group;
                            $groupList[] = $group->id;
                        }

                        $groupsRequest = $request->input('groups');
                        if (!is_array($groupsRequest)) {
                            $groupsRequest = [];
                        }

                        $defaultGroup = auth()->getDefaultRole();
                        if (
                            !in_array($defaultGroup, $groupsRequest)
                            && $angel->groups->where('id', $defaultGroup)->count()
                        ) {
                            if (!auth()->can('admin_groups') && !config('default_group_removable')) {
                                $html .= error(__('You cannot remove the default group.'), true);
                                break;
                            } else {
                                $html .= warning(
                                    __('You removed the default group, this has unintended side effects!'),
                                    true
                                );
                            }
                        }

                        $angel->groups()->detach();
                        $user_groups_info = [];
                        foreach ($groupsRequest as $group) {
                            if (in_array($group, $groupList)) {
                                $group = $groups[$group];
                                $angel->groups()->attach($group);
                                $user_groups_info[] = $group->name;
                            }
                        }
                        engelsystem_log(
                            'Set groups of ' . User_Nick_render($angel, true) . ' to: '
                            . join(', ', $user_groups_info)
                        );
                        $html .= success(__('User groups saved.'), true);
                    } else {
                        $html .= error(__('You cannot edit angels with more rights.'), true);
                    }
                } else {
                    $html .= error(__('You cannot edit your own rights.'), true);
                }
                break;

            case 'save':
                /** @var User $user_source */
                $user_source = User::findOrFail($user_id);

                $changed_email = false;
                $email = $request->postData('mail');
                if (
                    $user_source->email !== $email
                    && User::whereEmail($email)->whereNot('id', $user_source->id)->exists()
                ) {
                    $html .= error(__('settings.profile.email.already-taken') . "\n", true);
                    break;
                }
                if ($user_source->settings->email_human && !is_null($email)) {
                    $changed_email = $user_source->email !== $email;
                    $user_source->email = $email;
                }

                $changed_nick = false;
                $nick = trim((string) $request->get('nick'));
                $nickValid = (new Username())->validate($nick);
                if (
                    $user_source->name !== $nick
                    && User::whereName($nick)->whereNot('id', $user_source->id)->exists()
                ) {
                    $html .= error(__('settings.profile.nick.already-taken') . "\n", true);
                    break;
                }
                $old_nick = $user_source->name;
                if ($nickValid && $user_nick_edit) {
                    $changed_nick = $user_source->name !== $nick
                        && !User::whereName($nick)->whereNot('id', $user_source->id)->exists();
                    $user_source->name = $nick;
                }
                $user_source->save();

                if (config('enable_full_name')) {
                    $user_source->personalData->first_name = $request->postData('first_name');
                    $user_source->personalData->last_name = $request->postData('last_name');
                }
                if ($goodie_tshirt && $user_goodie_edit) {
                    $user_source->personalData->shirt_size = $request->postData('shirt_size');
                }
                if ($user_goodie_edit) {
                    $user_source->personalData->has_payday = (bool) $request->postData('has_payday');
                }
                $user_source->personalData->save();

                $user_source->contact->mobile = $request->postData('mobile');
                if (config('enable_dect')) {
                    $user_source->contact->dect = $request->postData('dect');
                }
                $user_source->contact->save();

                if ($goodie_enabled && $user_goodie_edit) {
                    $user_source->state->got_goodie = $request->postData('goodie');
                }
                if ($user_info_edit) {
                    $user_source->state->user_info = $request->postData('userInfo');
                }
                if (auth()->can('user.fa.edit') && config('enable_force_active')) {
                    $user_source->state->force_active = $request->input('force_active');
                }
                if (auth()->can('user.ff.edit') && config('enable_force_food')) {
                    $user_source->state->force_food = $request->input('force_food');
                }
                $user_source->state->save();

                engelsystem_log(
                    'Updated user: ' . ($changed_nick
                        ? ('nick modified from ' . $old_nick . ' (' . $user_source->id . ') to ' . $user_source->name)
                        : $user_source->name)
                    . ' (' . $user_source->id . ')'
                    . ($changed_email ? ', e-mail modified' : '')
                    . ($goodie_tshirt ? ', T-shirt size: ' . $user_source->personalData->shirt_size : '')
                    . (config('enable_force_active') ? (', force-active: ' . $user_source->state->force_active) : '')
                    . (config('enable_force_food') ? (', force-food: ' . $user_source->state->force_food) : '')
                    . ($goodie_enabled ? ', goodie: ' . $user_source->state->got_goodie : '')
                    . ($user_info_edit ? ', user-info: ' . $user_source->state->user_info : '')
                );
                $html .= success(__('Changes were saved.') . "\n", true);
                break;

            case 'assign_voucher_exception':
                if (!$pretix_edit) {
                    $html .= error(__('day_ticket_deal.admin.exception.no_perm'), true);
                    break;
                }

                $target = User::findOrFail($user_id);
                $pool1 = (string) $request->postData('pool1');
                $pool2 = (string) $request->postData('pool2');
                $reason = trim((string) $request->postData('reason'));
                $pools = array_values(array_unique(array_filter([$pool1, $pool2], fn ($p) => $p !== '')));

                $refundHours = trim((string) $request->postData('refund_hours'));
                if ($refundHours !== '') {
                    $target->personalData->refund_hours_override = (float) $refundHours;
                    $target->personalData->save();
                    engelsystem_log(
                        'Admin voucher exception: ' . User_Nick_render($user, true)
                        . ' set required completed hours for refund to ' . $refundHours . ' for '
                        . User_Nick_render($target, true)
                    );
                }

                if (!$pools) {
                    if ($refundHours !== '') {
                        $html .= success(__('day_ticket_deal.admin.exception.refund_hours.saved'), true);
                    } else {
                        $html .= error(__('day_ticket_deal.admin.exception.none_selected'), true);
                    }
                    break;
                }

                $assignedCodes = [];
                $emptyPools = [];
                foreach ($pools as $pool) {
                    $code = PretixVoucherException_assign($user, $target, $pool, $reason);
                    if ($code) {
                        $assignedCodes[] = $code;
                    } else {
                        $emptyPools[] = PretixVoucher::poolLabel($pool);
                    }
                }

                if ($assignedCodes) {
                    $html .= success(
                        sprintf(__('day_ticket_deal.admin.exception.success'), implode(', ', $assignedCodes)),
                        true
                    );
                }
                if ($emptyPools) {
                    $html .= error(
                        sprintf(__('day_ticket_deal.admin.exception.pool_empty'), implode(', ', $emptyPools)),
                        true
                    );
                }
                break;

            case 'change_pw':
                if (
                    $request->postData('new_pw') != ''
                    && $request->postData('new_pw') == $request->postData('new_pw2')
                ) {
                    $user_source = User::find($user_id);
                    auth()->setPassword($user_source, $request->postData('new_pw'));
                    engelsystem_log('Set new password for ' . User_Nick_render($user_source, true));
                    $html .= success(__('Password reset done.'), true);
                } else {
                    $html .= error(
                        __('The entries must match and must not be empty!'),
                        true
                    );
                }
                break;
        }
    }

    $link = button(url('/users', ['action' => 'view', 'user_id' => $user_id]), icon('chevron-left'), 'btn-sm', '', __('general.back'));
    return page_with_title(
        $link . ' ' . __('Edit user'),
        [
        $html,
        ]
    );
}

/**
 * @param $myHighestGroup
 * @param $angelId
 * @return Collection|Group[]
 */
function changeableGroups($myHighestGroup, $angelId): Collection
{
    return Group::query()
        ->where('groups.id', '<=', $myHighestGroup)
        ->join('users_groups', function ($query) use ($angelId) {
            /** @var JoinClause $query */
            $query->where('users_groups.group_id', '=', $query->raw('groups.id'))
                ->where('users_groups.user_id', $angelId);
        }, null, null, 'left outer')
        ->orderBy('name')
        ->get([
            'groups.*',
            'users_groups.group_id as selected',
        ]);
}
