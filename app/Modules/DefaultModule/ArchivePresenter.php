<?php

namespace App\Modules\DefaultModule;

use App\Components\TeamList\TeamListComponent;
use App\Components\TeamResults\TeamResultsComponent;
use Exception;
use Fykosak\NetteFKSDBDownloader\ORM\Models\ModelEvent;
use Fykosak\NetteFKSDBDownloader\ORM\Services\ServiceEvent;
use Nette\Application\BadRequestException;
use Nette\Http\IResponse;
use Throwable;

class ArchivePresenter extends BasePresenter {

    /**
     * @persistent
     */
    public ?int $year;

    protected ModelEvent $event;

    protected ServiceEvent $serviceEvent;

    public function injectServiceEvent(ServiceEvent $serviceEvent): void {
        $this->serviceEvent = $serviceEvent;
    }

    /**
     * @throws BadRequestException
     * @throws Exception|Throwable
     */
    protected function startUp(): void {
        parent::startUp();
        $event = $this->serviceEvent->getEventByYear([9], $this->year);
        if (is_null($event)) {
            throw new BadRequestException(_('Event not found'), IResponse::S404_NOT_FOUND);
        }
        $this->event = $event;
    }

    protected function createComponentTeamList(): TeamListComponent {
        return new TeamListComponent($this->getContext(), $this->event->eventId);
    }

    protected function createComponentTeamResults(): TeamResultsComponent {
        return new TeamResultsComponent($this->getContext(), $this->event->eventId);
    }
}
