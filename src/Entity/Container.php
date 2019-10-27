<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContainerRepository")
 */
class Container
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
    private $titre;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Blog", mappedBy="container")
     */
    private $blogs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="container")
     */
    private $articles;

    /**
     * @ORM\Column(type="array")
     */
    private static $childs = [];

    public function __construct($titre)
    {
        $this->blogs = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->titre = $titre;
        Container::addChild($this);

    }

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

    /**
     * @return Collection|Blog[]
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    public function addBlog(Blog $blog): self
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs[] = $blog;
            $this->addChild($blog);
        }

        return $this;
    }

    public function removeBlog(Blog $blog): self
    {

        if ($this->blogs->contains($blog)) {
            $this->blogs->removeElement($blog);
            $this->childs->removeElement($blog);
            // set the owning side to null (unless already changed)
        }

        return $this;
    }

    /**
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $this->addChild($article);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
            $this->childs->removeElement($article);
            // set the owning side to null (unless already changed)
        }

        return $this;
    }

    public static function getChilds(): ?array
    {
        return Container::$childs;
    }

    public static function setChilds(array $childs): ?array
    {
        Container::$childs = $childs;

        return Container::getChilds();
    }

    public static function addChild(Container $child): ?array
    {
        if (!in_array($child,Container::$childs)) {
            Container::$childs[] = $child;
        }

        return Container::getChilds();
    }
}
