<?php
/**
 * WebDav configuration
 */

namespace HDNET\Calendarize\Domain\Model;

/**
 * WebDav configuration
 * @db
 * @smartExclude Workspaces,Languages
 */
class WebDav extends AbstractModel
{

    /**
     * Title
     *
     * @var string
     * @db
     */
    protected $title;

    /**
     * User storage
     *
     * @var string
     * @db
     */
    protected $userStorage;

    /**
     * Event storage
     *
     * @var string
     * @db
     */
    protected $eventStorage;

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get user storage
     *
     * @return string
     */
    public function getUserStorage()
    {
        return $this->userStorage;
    }

    /**
     * Set user storage
     *
     * @param string $userStorage
     */
    public function setUserStorage($userStorage)
    {
        $this->userStorage = $userStorage;
    }

    /**
     * Get event storage
     *
     * @return string
     */
    public function getEventStorage()
    {
        return $this->eventStorage;
    }

    /**
     * Set event storage
     *
     * @param string $eventStorage
     */
    public function setEventStorage($eventStorage)
    {
        $this->eventStorage = $eventStorage;
    }

}