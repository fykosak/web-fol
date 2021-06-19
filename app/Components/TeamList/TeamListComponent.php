<?php

namespace App\Components\TeamList;

use Fykosak\NetteFKSDBDownloader\ORM\Services\ServiceEventDetail;
use Fykosak\Utils\BaseComponent\BaseComponent;
use Exception;
use Nette\DI\Container;
use Throwable;

class TeamListComponent extends BaseComponent {

    protected ServiceEventDetail $serviceTeam;
    protected int $eventId;
    protected string $category;

    public function __construct(Container $container, int $eventId, string $category) {
        parent::__construct($container);
        $this->eventId = $eventId;
        $this->category = $category;
    }

    public function injectServiceTeam(ServiceEventDetail $serviceTeam): void {
        $this->serviceTeam = $serviceTeam;
    }

    /**
     * @throws Exception
     * @throws Throwable
     */
    public function render(): void {
        $teams = [];
        foreach ($this->serviceTeam->getTeams($this->eventId) as $team) {
            //Debugger::barDump($team);
            $category = $team->category;
            if (!isset($teams[$category])) {
                $teams[$category] = [];
            }
            $teams[$category][] = $team;
        }
        $this->template->teams = $teams;
        $this->template->render(__DIR__ . DIRECTORY_SEPARATOR . 'teamList.latte');
    }
}
