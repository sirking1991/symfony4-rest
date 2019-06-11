<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $jira_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $wfm_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getJiraId(): ?string
    {
        return $this->jira_id;
    }

    public function setJiraId(?string $jira_id): self
    {
        $this->jira_id = $jira_id;

        return $this;
    }

    public function getWfmId(): ?int
    {
        return $this->wfm_id;
    }

    public function setWfmId(?int $wfm_id): self
    {
        $this->wfm_id = $wfm_id;

        return $this;
    }
}
