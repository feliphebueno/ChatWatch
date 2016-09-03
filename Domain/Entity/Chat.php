<?php
namespace Entities;
/** @Entity 
* @Table(name="chat",indexes={@Index(name="chatId", columns={"chatId"})})
*/
class Chat
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;

    /** @Column(name="chatId", type="string", length=50) */
    private $chatId;

    /** @Column(type="string", length=140) */

    private $title;

    /** @Column(type="string", length=10) */
    private $type;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set chatId
     *
     * @param integer $chatId
     *
     * @return Chat
     */
    public function setChatId($chatId)
    {
        $this->chatId = $chatId;

        return $this;
    }

    /**
     * Get chatId
     *
     * @return integer
     */
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Chat
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

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
     * Set type
     *
     * @param string $type
     *
     * @return Chat
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
