<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Tests\Behat\Context\Ui\Backend;

use Behat\Behat\Context\Context;
use Monofony\Tests\Behat\NotificationType;
use Monofony\Tests\Behat\Service\NotificationCheckerInterface;

final class NotificationContext implements Context
{
    /**
     * @var NotificationCheckerInterface
     */
    private $notificationChecker;

    /**
     * @param NotificationCheckerInterface $notificationChecker
     */
    public function __construct(NotificationCheckerInterface $notificationChecker)
    {
        $this->notificationChecker = $notificationChecker;
    }

    /**
     * @Then I should be notified that it has been successfully created
     */
    public function iShouldBeNotifiedItHasBeenSuccessfullyCreated(): void
    {
        $this->notificationChecker->checkNotification('has been successfully created.', NotificationType::success());
    }

    /**
     * @Then I should be notified that it has been successfully edited
     */
    public function iShouldBeNotifiedThatItHasBeenSuccessfullyEdited(): void
    {
        $this->notificationChecker->checkNotification('has been successfully updated.', NotificationType::success());
    }

    /**
     * @Then I should be notified that it has been successfully deleted
     */
    public function iShouldBeNotifiedThatItHasBeenSuccessfullyDeleted(): void
    {
        $this->notificationChecker->checkNotification('has been successfully deleted.', NotificationType::success());
    }

    /**
     * @Then I should be notified that they have been successfully deleted
     */
    public function iShouldBeNotifiedThatTheyHaveBeenSuccessfullyDeleted(): void
    {
        $this->notificationChecker->checkNotification('have been successfully deleted.', NotificationType::success());
    }
}
