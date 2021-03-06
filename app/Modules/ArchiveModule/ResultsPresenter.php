<?php

namespace App\Modules\ArchiveModule;

use App\Components\TeamResults\TeamResultsComponent;

class ResultsPresenter extends BasePresenter {
    
    /**
     * @return void
     * @throws \Exception
     */
    public function renderDefault(): void {
        $this->setPageTitle(_('Results'));
    }

    /**
     * @return TeamResultsComponent
     * @throws BadRequestException
     * @throws \Throwable
     */
    protected function createComponentTeamResults(): TeamResultsComponent {
        return new TeamResultsComponent($this->getContext(), $this->getEvent()->eventId);
    }

}
