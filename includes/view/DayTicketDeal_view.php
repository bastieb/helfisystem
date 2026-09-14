<?php

use Engelsystem\Models\User\User;

/**
 * helfisystem: Seite fuer den 5h-Tagesticket-Deal.
 */
function DayTicketDeal_title(): string
{
    return __('day_ticket_deal.title');
}

function DayTicketDeal_view(User $user, array $eligibility): string
{
    $personalData = $user->personalData;
    $link = button(user_link($user->id), icon('chevron-left'), 'btn-sm', '', __('general.back'));

    if ($personalData->day_ticket_deal_confirmed) {
        $dayLabels = [
            'fri' => __('day_ticket_deal.day.fri'),
            'sat' => __('day_ticket_deal.day.sat'),
            'sun' => __('day_ticket_deal.day.sun'),
        ];
        $day = $dayLabels[$personalData->day_ticket_deal_day] ?? $personalData->day_ticket_deal_day;

        return page_with_title($link . ' ' . DayTicketDeal_title(), [
            msg(),
            success(sprintf(__('day_ticket_deal.already_confirmed'), $day), true),
        ]);
    }

    if (!$eligibility['eligible']) {
        return page_with_title($link . ' ' . DayTicketDeal_title(), [
            msg(),
            info(__('day_ticket_deal.not_eligible'), true),
        ]);
    }

    $dayChoice = '';
    if ($eligibility['freeChoice']) {
        $dayChoice = join('', [
            form_radio('day', __('day_ticket_deal.day.fri'), false, 'fri'),
            form_radio('day', __('day_ticket_deal.day.sat'), false, 'sat'),
            form_radio('day', __('day_ticket_deal.day.sun'), false, 'sun'),
        ]);
    } else {
        $dayLabels = [
            'fri' => __('day_ticket_deal.day.fri'),
            'sat' => __('day_ticket_deal.day.sat'),
            'sun' => __('day_ticket_deal.day.sun'),
        ];
        $fixedDay = $eligibility['fixedDay'];
        $dayChoice = form_info(__('day_ticket_deal.your_day'), $dayLabels[$fixedDay] ?? $fixedDay)
            . '<input type="hidden" name="day" value="' . htmlspecialchars($fixedDay) . '">';
    }

    return page_with_title($link . ' ' . DayTicketDeal_title(), [
        msg(),
        warning(__('day_ticket_deal.warning_text'), true),
        form([
            $dayChoice,
            form_checkbox('confirm', __('day_ticket_deal.confirm_checkbox'), false),
            form_submit('submit', __('day_ticket_deal.confirm_button'), '', true, 'warning'),
        ]),
    ]);
}
