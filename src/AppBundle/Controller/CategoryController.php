<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation as Doc;

class CategoryController extends Controller
{
	/**
	 * @Rest\Get(
	 *		path = "/categories",
	 * 		name = "category_list"
	 * )
	 * @Rest\View()
	 * @Doc\ApiDoc(
	 *		section="Categories",
	 * 		resource=true,
	 *		description="Get the list of all categories."
	 * )
	 */
	public function listCategoryAction()
	{
		$categories = $this->getDoctrine()->getManager()->getRepository('AppBundle:Category')->findAll();

		return $categories;
	}

	/**
	 * @Rest\Get(
	 *		path = "/categories/{id}",
	 *		name = "get_category",
	 *		requirements = {"id"="\d+"}
	 * )
	 * @Rest\View()
	 * @Doc\ApiDoc(
	 *		section="Categories",
	 *		resource=true,
	 *		description="Get one category.",
	 *		requirements={
	 * 			{
	 *				"name"="id",
	 *				"dataType"="integer",
	 *				"requirement"="\d+",
	 *				"description"="The category unique identifier."
	 * 			}
	 *		}
	 * )
	 */
	public function getCategoryAction(Category $category)
	{
		return $category;
	}

}
