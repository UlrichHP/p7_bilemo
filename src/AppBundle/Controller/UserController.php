<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation as Doc;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/api")
 */
class UserController extends Controller
{
    /**
     * @Rest\Get(
     *		path = "/user/me",
     *		name = "get_user_infos"
     * )
     *
     * @Rest\View()
     * @Doc\ApiDoc(
     *		section = "User",
     *		resource = true,
     *		description = "Get current user informations."
     * )
     */
    public function getUserInfoAction(Request $request)
    {
        $user = $this->getUser();

        return $user;
    }

    /**
     * @Rest\Get(
     *		path = "/users",
     *		name = "users_list"
     * )
     * 
     * @Rest\View()
     *
     * @Doc\ApiDoc(
     *		section = "User",
     *		resource = true,
     *		description = "Get all users registered."
     * )
     */
    public function getUsersAction()
    {
        $users = $this->getDoctrine()->getManager()->getRepository('AppBundle:User')->findAll();
        return $users;
    }

    /**
     * @Rest\Get(
     *		path = "/user/{id}",
     *		name = "get_user",
     *		requirements = {"id"="\d+"}
     * )
     *
     * @Rest\View()
     * 
     * @Doc\ApiDoc(
     * 		section = "User",
     * 		resource = true,
     *		description = "Get one user.",
     *		requirements={
     * 			{
     *				"name"="id",
     *				"dataType"="integer",
     *				"requirement"="\d+",
     *				"description"="The user unique identifier."
     * 			}
     *		}
     * )
     */
    public function getUserAction(User $user)
    {
        return $user;
    }

    /**
     * @Rest\Delete(
     *     path = "/user/{id}",
     *     name = "delete_user",
     *     requirements = {"id"="\d+"}
     * )
     *
     * @Security("has_role('ROLE_ADMIN')")
     * 
     * @Rest\View(statusCode=204)
     *
     * @Doc\ApiDoc(
     *     resource=true,
     *     description="Delete one user.",
     *     section="User",
     *     requirements={
     *         {
     *             "name"="id",
     *             "dataType"="integer",
     *             "requirements"="\d+",
     *             "description"="The user unique identifier."
     *         }
     *     }
     * )
     */
    public function delUserAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);

        $em->remove($user);
        $em->flush();
    }
}
