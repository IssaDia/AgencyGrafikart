<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch {


	private $maxPrice;
	
	/**
	 * @Assert\Range(min=10,max=400)
	 *
	 * @var [type]
	 */
    private $minSurface;

	public function getMaxPrice() {
		return $this->maxPrice;
	}

	public function setMaxPrice( $maxPrice)  {
        $this->maxPrice = $maxPrice;
        return $this;
	}

	public function getMinSurface() {
		return $this->minSurface;
	}

	public function setMinSurface( $minSurface)  {
        $this->minSurface = $minSurface;
        return $this;
	}
}