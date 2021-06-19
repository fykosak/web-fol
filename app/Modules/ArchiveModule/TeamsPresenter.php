<?php

namespace App\Modules\ArchiveModule;

use App\Components\TeamList\TeamListComponent;

class TeamsPresenter extends BasePresenter {

    /**
     * @return void
     * @throws \Exception
     */
    public function renderList(): void {
        $this->setPageTitle(_('Team List'));
    }

    protected function createComponentTeamList(): TeamListComponent {
        return new TeamListComponent($this->getContext(), $this->getEvent()->eventId);
    }
}