<?php
/**
 * Product, contains all products in Staples inventory.
 * When the user selects the products, they are included
 * in productOrder.
 *
 * @author Samuel Van Chandler <samuelvanchandler@gmail.com>
 **/
class Product {
	/**
	 * id for this Product; primary key
	 * @var int $productId
	 **/
	private $productId;
	/**
	 * productDescription, info about the product
	 * @var string $productDescription
	 **/
	private $productDescription;

	/**
	 * accessor method for product id
	 * @return int value of product id
	 **/
	public function getProductId() {
		return ($this->productId);
	}
	/**
	 * @param int $newProductId new value of product id
	 * @throws InvalidArgumentException if product id isn't an integer
	 * @throws RangeException if product id is negative
	 **/
	public function setProductId($newProductId) {
		//base case: if the product id is null. this is a new product without a mySQL assigned id (yet)
		if($newProductId === null) {
			$this->productId = null;
			return;
		}

		$newProductId = filter_var($newProductId, FILTER_VALIDATE_INT);
		if($newProductId === false) {
			throw(new InvalidArgumentException("prodcutid is not an integer"));
		}

		if($newProductId <= 0) {
			throw(new RangeException("product id must be positive"));
		}
	}
	/**
	 * accessor method for product description
	 * @return string descriptiopn of product
	 **/
	public function getProductDescription() {
		return ($this->productDescription);
	}
	/**
	 * @param int $newProductDescription sets new value of product description
	 * @throws InvalidArgumentException if product description doesn't exist
	 * @throws RangeException if product description is too long, 255 char max
	 **/
	public function setProductDescription($newProductDescription) {
		$newProductDescription = filter_var($newProductDescription, FILTER_SANITIZE_STRING);
		if(empty($newProductDescription) === true) {
			throw(new InvalidArgumentException("Product description does not exist"));
		}
		if(strlen($newProductDescription) > 255) {
			throw(new RangeException("Product description is too long, 255 character max."));
		}
	}
}