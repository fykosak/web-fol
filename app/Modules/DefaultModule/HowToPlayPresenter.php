<?php

namespace App\Modules\DefaultModule;

class HowToPlayPresenter extends BasePresenter {

    public function renderDefault(): void
    {
        $this->setPagetitle(_('How to play'));
        $this->changeViewByLang();
    }

}
