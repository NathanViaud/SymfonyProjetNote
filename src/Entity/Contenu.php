<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenu
 *
 * @ORM\Table(name="contenu", uniqueConstraints={@ORM\UniqueConstraint(name="contenu_uq", columns={"IDMORCEAU", "IDALBUM"})}, indexes={@ORM\Index(name="contenu_album_fk", columns={"IDALBUM"}), @ORM\Index(name="IDX_89C2003FAD7D3E89", columns={"IDMORCEAU"})})
 * @ORM\Entity
 */
class Contenu
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Morceau
     *
     * @ORM\ManyToOne(targetEntity="Morceau")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDMORCEAU", referencedColumnName="ID")
     * })
     */
    private $idmorceau;

    /**
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDALBUM", referencedColumnName="ID")
     * })
     */
    private $idalbum;


}
