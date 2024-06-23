<div>
    {{ $getRecord()->due_date }}
    @php
        $due_date = \Carbon\Carbon::parse($getRecord()->due_date);
        $date_text = match ($due_date->isToday()) {
            true => "Tasks Today",
            false => match ($due_date->isTomorrow()) {
                true => "Tasks Tomorrow",
                false => match (boolval($due_date->isBetween(now(), now()->addWeeks(1)))) {
                    true => "Tasks Next Week",
                    false => match (boolval($due_date->isAfter(now()->addWeeks(1)))) {
                        true => "Tasks in the Near Future",
                        false => "Tasks in the Future",
                    },
                },
            },
        };
    @endphp
    {{ $date_text }}
</div>