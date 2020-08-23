<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

class PropertySearch
{

	/**
	 * @var int§null
	 */
	private $maxPrice;

	/**
	 * @var int§null
	 */
	private $minSurface;

	/**
	 * @var ArrayCollection
	 */
	private $options;


	public function __construct() 
	{
		$this->options = new ArrayCollection;
	}


	/**
	 * @return int§null
	 */
	public function getMaxPrice()
	{
		return $this->maxPrice;
	}

	/**
	 * @param int|null $maxprice
	 * @return int§null
	 */
	public function setMaxPrice(int $maxPrice)
	{
		$this->maxPrice = $maxPrice;
		return $this;
	}

	/**
	 * @return int§null
	 */
	public function getMinSurface()
	{
		return $this->minSurface;
	}

	/**
	 * @param int|null $minSurface
	 * @return int§null
	 */
	public function setMinSurface(int $minSurface)
	{
		$this->minSurface = $minSurface;
		return $this;
	}

		/**
	 * @return ArrayCollection
	 */
	public function getOptions()
	{
		return $this->options;
	}

	/**
	 * @param ArrayCollection $options
	 */
	public function setOptions(Array $options): void
	{
		$this->options = $options;
		
	}
}
