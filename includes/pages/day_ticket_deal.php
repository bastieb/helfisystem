<?php

/**
 * helfisystem: Seite fuer den 5h-Tagesticket-Deal (Auf-/Abbau-Ausnahme).
 *
 * @return array
 */
function day_ticket_deal_controller()
{
    $user = auth()->user();
    $request = request();

    $eligibility = DayTicketDeal_check_eligibility($user);

    if (
        $request->hasPostData('submit')
        && $eligibility['eligible']
        && !$user->personalData->day_ticket_deal_confirmed
    ) {
        if (!$request->hasPostData('confirm')) {
            error(__('day_ticket_deal.confirm_required'));
        } else {
            $day = (string) $request->postData('day');
            $allowedDays = $eligibility['freeChoice'] ? ['fri', 'sat', 'sun'] : [$eligibility['fixedDay']];

            if (!in_array($day, $allowedDays, true)) {
                error(__('day_ticket_deal.invalid_day'));
            } else {
                $code = DayTicketDeal_confirm($user, $day);
                if ($code === null) {
                    error(__('day_ticket_deal.pool_empty'));
                } else {
                    success(__('day_ticket_deal.confirmed'));
                    throw_redirect(url('/day-ticket-deal'));
                }
            }
        }
    }

    return [DayTicketDeal_title(), DayTicketDeal_view($user, $eligibility)];
}
