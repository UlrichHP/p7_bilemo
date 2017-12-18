<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use AppBundle\Representation\Products;
use Nelmio\ApiDocBundle\Annotation as Doc;

/**
* @Route("/api")
*/
class ProductController extends Controller
{
    /**
     * @Rest\Get(
     *		path = "/products",
     * 		name = "products_list"
     * )
     * @Rest\QueryParam(
     *     name="keyword",
     *     requirements="[a-zA-Z0-9]",
     *     nullable=true,
     *     description="The keyword to search for."
     * )
     * @Rest\QueryParam(
     *     name="order",
     *     requirements="asc|desc",
     *     default="asc",
     *     description="Sort order (asc or desc)."
     * )
     * @Rest\QueryParam(
     *     name="limit",
     *     requirements="\d+",
     *     default="15",
     *     description="Max number of products per page."
     * )
     * @Rest\QueryParam(
     *     name="offset",
     *     requirements="\d+",
     *     default="0",
     *     description="The pagination offset."
     * )
     * @Rest\View()
     * @Doc\ApiDoc(
     *		section="Products",
     * 		resource=true,
     *		description="Get the list of all products."
     * )
     */
    public function listProductAction(ParamFetcherInterface $paramFetcher)
    {
        $pager = $this->getDoctrine()->getManager()->getRepository('AppBundle:Product')->search(
            $paramFetcher->get('keyword'),
            $paramFetcher->get('order'),
            $paramFetcher->get('limit'),
            $paramFetcher->get('offset')
        );

        return new Products($pager);
    }

    /**
     * @Rest\Get(
     *		path = "/product/{id}",
     *		name = "get_product",
     *		requirements = {"id"="\d+"}
     * )
     * @Rest\View()
     * @Doc\ApiDoc(
     *		section="Products",
     *		resource=true,
     *		description="Get one product.",
     *		requirements={
     * 			{
     *				"name"="id",
     *				"dataType"="integer",
     *				"requirement"="\d+",
     *				"description"="The product unique identifier."
     * 			}
     *		}
     * )
     */
    public function getProductAction(Product $product)
    {
        return $product;
    }

}
