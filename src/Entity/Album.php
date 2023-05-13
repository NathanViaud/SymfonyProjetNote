<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Album
 *
 * @ORM\Table(name="album", indexes={@ORM\Index(name="album_groupe_fk", columns={"IDGROUPE"}), @ORM\Index(name="album_artiste_fk", columns={"IDARTISTE"})})
 * @ORM\Entity
 * @ApiResource(normalizationContext={"groups"={"album"}})
 * @ApiFilter(SearchFilter::class, properties={"titre": "partial", "genre" = "excat"})
 * 
 */
class Album
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"album"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TITRE", type="string", length=100, nullable=false)
     * @Groups({"album"})
     * @Assert\NotBlank(message="The title is required")
     * @Assert\Length(
     *    max = 100,
     *    maxMessage = "The title cannot be longer than {{ limit }} characters",
     * )
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="GENRE", type="string", length=50, nullable=false)
     * @Groups({"album"})
     * @Assert\NotBlank(message="The genre is required")
     * @Assert\Length(
     *  max = 50,
     *  maxMessage = "The genre cannot be longer than {{ limit }} characters",
     * )
     */
    private $genre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATESORTIE", type="date", nullable=false)
     * @Groups({"album"})
     * @Assert\NotBlank(message="The date is required")
     * @Assert\Date(message="The date is not valid")
     * @Assert\LessThanOrEqual("today", message="The date cannot be in the future")
     */
    private $datesortie;

    /**
     * @var string
     *
     * @ORM\Column(name="PRIX", type="decimal", precision=5, scale=2, nullable=false)
     * @Groups({"album"})
     * @Assert\NotBlank(message="The price is required")
     * @Assert\Positive(message="The price must be positive")
     */
    private $prix;

    /**
     * @var \Artiste
     * @ApiSubresource
     * @ORM\ManyToOne(targetEntity="Artiste")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDARTISTE", referencedColumnName="ID")
     * })
     * @Groups({"album"})
     */
    private $idartiste;

    /**
     * @var \Groupe
     * @ApiSubresource
     * @ORM\ManyToOne(targetEntity="Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDGROUPE", referencedColumnName="ID")
     * })
     * @Groups({"album"})
     */
    private $idgroupe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDatesortie(): ?\DateTimeInterface
    {
        return $this->datesortie;
    }

    public function setDatesortie(\DateTimeInterface $datesortie): self
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdartiste(): ?Artiste
    {
        return $this->idartiste;
    }

    public function setIdartiste(?Artiste $idartiste): self
    {
        $this->idartiste = $idartiste;

        return $this;
    }

    public function getIdgroupe(): ?Groupe
    {
        return $this->idgroupe;
    }

    public function setIdgroupe(?Groupe $idgroupe): self
    {
        $this->idgroupe = $idgroupe;

        return $this;
    }


}
