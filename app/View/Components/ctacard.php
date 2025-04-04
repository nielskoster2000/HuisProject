<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ctacard extends Component
{
    public ?string $title;
    public ?string $emailPlaceholder;
    public ?string $cityPlaceholder;
    public ?array $options;

    /**
     * Create a new component instance.
     */
    public function __construct(?string $title = null, ?string $emailPlaceholder = null, ?string $cityPlaceholder = null, ?array $options = null)
    {
        $this->title = $title ?? 'Vind jouw ideale huurwoning met onze slimme zoekservice';
        $this->emailPlaceholder = $emailPlaceholder ?? 'Bijv. voorbeeld@mail.nl';
        $this->cityPlaceholder = $cityPlaceholder ?? 'Amsterdam';
        $this->options = $options ?? ['Direct', 'Indirect'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ctacard', [
            'title' => $this->title,
            'emailPlaceholder' => $this->emailPlaceholder,
            'cityPlaceholder' => $this->cityPlaceholder,
            'options' => $this->options,
        ]);
    }
}
