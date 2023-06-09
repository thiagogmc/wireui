<?php

namespace WireUi\Traits\Components;

trait HasSetupBadge
{
    public bool $full = false;

    public mixed $label = null;

    protected function setupBadge(array &$component): void
    {
        $this->full = $this->getFull();

        $this->label = $this->data->get('label');

        $this->setBadgeVariables($component);

        $this->smart(['full', 'label']);
    }

    private function getFull(): bool
    {
        if ($this->data->has('full')) {
            return (bool) $this->data->get('full');
        }

        return (bool) (config("wireui.{$this->config}.full") ?? false);
    }

    private function setBadgeVariables(array &$component): void
    {
        $component['full'] = $this->full;

        $component['label'] = $this->label;
    }
}
