<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use ApiPlatform\Core\Annotation\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use Apiplatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;


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
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="GENRE", type="string", length=50, nullable=false)
     * @Groups({"album"})
     */
    private $genre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATESORTIE", type="date", nullable=false)
     * @Groups({"album"})
     */
    private $datesortie;

    /**
     * @var string
     *
     * @ORM\Column(name="PRIX", type="decimal", precision=5, scale=2, nullable=false)
     * @Groups({"album"})
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
