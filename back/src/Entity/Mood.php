<?php

namespace App\Entity;

use App\Repository\MoodRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MoodRepository::class)]
class Mood
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $label = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, DailyStatus>
     */
    #[ORM\OneToMany(targetEntity: DailyStatus::class, mappedBy: 'mood')]
    private Collection $dailyStatuses;

    /**
     * @var Collection<int, FeedBack>
     */
    #[ORM\OneToMany(targetEntity: FeedBack::class, mappedBy: 'mood')]
    private Collection $feedBacks;

    #[ORM\Column(length: 50)]
    private ?string $urlImage = null;

    public function __construct()
    {
        $this->dailyStatuses = new ArrayCollection();
        $this->feedBacks = new ArrayCollection();
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
            $dailyStatus->setMood($this);
        }

        return $this;
    }

    public function removeDailyStatus(DailyStatus $dailyStatus): static
    {
        if ($this->dailyStatuses->removeElement($dailyStatus)) {
            // set the owning side to null (unless already changed)
            if ($dailyStatus->getMood() === $this) {
                $dailyStatus->setMood(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FeedBack>
     */
    public function getFeedBacks(): Collection
    {
        return $this->feedBacks;
    }

    public function addFeedBack(FeedBack $feedBack): static
    {
        if (!$this->feedBacks->contains($feedBack)) {
            $this->feedBacks->add($feedBack);
            $feedBack->setMood($this);
        }

        return $this;
    }

    public function removeFeedBack(FeedBack $feedBack): static
    {
        if ($this->feedBacks->removeElement($feedBack)) {
            // set the owning side to null (unless already changed)
            if ($feedBack->getMood() === $this) {
                $feedBack->setMood(null);
            }
        }

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function setUrlImage(string $urlImage): static
    {
        $this->urlImage = $urlImage;

        return $this;
    }
}
