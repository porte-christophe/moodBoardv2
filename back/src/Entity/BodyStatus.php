<?php

namespace App\Entity;

use App\Repository\BodyStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BodyStatusRepository::class)]
class BodyStatus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, DailyStatus>
     */
    #[ORM\OneToMany(targetEntity: DailyStatus::class, mappedBy: 'id_body_status')]
    private Collection $dailyStatuses;

    public function __construct()
    {
        $this->dailyStatuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, DailyStatus>
     */
    public function getDailyStatuses(): Collection
    {
        return $this->dailyStatuses;
    }

    public function addDailyStatus(DailyStatus $dailyStatus): static
    {
        if (!$this->dailyStatuses->contains($dailyStatus)) {
            $this->dailyStatuses->add($dailyStatus);
            $dailyStatus->setIdBodyStatus($this);
        }

        return $this;
    }

    public function removeDailyStatus(DailyStatus $dailyStatus): static
    {
        if ($this->dailyStatuses->removeElement($dailyStatus)) {
            // set the owning side to null (unless already changed)
            if ($dailyStatus->getIdBodyStatus() === $this) {
                $dailyStatus->setIdBodyStatus(null);
            }
        }

        return $this;
    }
}
