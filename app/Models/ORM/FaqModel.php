<?php

namespace App\Models\ORM;

use Fykosak\NetteORM\AbstractModel;

/**
 * @property-read int faq_id
 * @property-read string question
 * @property-read string answer
 * @property-read string lang
 * @property-read string|null category
 */
class FaqModel extends AbstractModel {

    public function getCategory(): string {
        switch ($this->category) {
            case 'game' : return _('game');
            case 'hurry-up' : return _('hurry-up');
            case 'registration' : return _('registration');
            case 'scoring' : return _('scoring');
            case 'skipping' : return _('skipping');
            case 'submits' : return _('submits');
            case 'tasks' : return _('tasks');
            case 'otherFAQ' : return _('otherFAQ');
            default : return _('OtherFAQ');
        }
    }
}
