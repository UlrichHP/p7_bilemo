<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation as Doc;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use AppBundle\Exception\ResourceValidationException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends FOSRestController
{
    /**
     * @Rest\Post(
     *		path = "/register",
     *		name = "user_registration",
     * )
     * @Rest\View(StatusCode = 201)
     * @Rest\RequestParam(
     *		name = "email",
     *		requirements = "[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}",
     *		nullable = false,
     * 		description = "User's email."
     * )
     * @Rest\RequestParam(
     *		name = "username",
     *		nullable = false,
     * 		description = "User's username."
     * )
     * @Rest\RequestParam(
     *		name = "password",
     *		nullable = false,
     * 		description = "User's password."
     * )
     * @Rest\RequestParam(
     *		name = "lastname",
     *		requirements = "[A-Za-z- ]+",
     *		nullable = false,
     * 		description = "User's lastname."
     * )
     * @Rest\RequestParam(
     *		name = "firstname",
     *		requirements = "[A-Za-z- ]+",
     *		nullable = false,
     * 		description = "User's firstname."
     * )
     * @Rest\RequestParam(
     *		name = "client_id",
     *		requirements = "[0-9]+_[a-zA-Z0-9]+",
     *		nullable = false,
     *		description = "The client_id with the client secret id."
     * )
     * @Rest\RequestParam(
     *		name = "client_secret",
     *		requirements = "[a-zA-Z0-9]+",
     *		nullable = true,
     *		description = "Client_secret used for authentication code and password grant type."
     * )
     * @Rest\RequestParam(
     *		name = "grant_type",
     *		requirements = "password|token|code",
     *		nullable = false,
     *		description = "Grant type requested"
     * )
     * @Rest\RequestParam(
     *		name = "redirect_uri",
     *		description = "The url where Oauth server will be redirected."
     * )
     * @Rest\RequestParam(
     *		name = "role",
     *      requirements = "ROLE_USER|ROLE_ADMIN",
     *      default = "ROLE_USER",
     *		nullable = true,
     *		description = "Optional, possibility to create an Admin who can delete users."
     * )
     * @Doc\ApiDoc(
     * 		section = "User",
     *		resource = true,
     *		description = "User registration."
     * )
     */
    public function registerAction(ParamFetcherInterface $paramFetcher, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $user->setEmail($paramFetcher->get('email'));
        $user->setUsername($paramFetcher->get('username'));
        $user->setPassword($encoder->encodePassword($user, $paramFetcher->get('password')));
        $user->setLastname($paramFetcher->get('lastname'));
        $user->setFirstname($paramFetcher->get('firstname'));
        $user->setRoles(array($paramFetcher->get('role')));
        $errors = $this->get('validator')->validate($user);
        if (count($errors)) {
            $message = 'The JSON sent contains invalid data. Here are the errors you need to correct: ';
            foreach ($errors as $error) {
                $message .= sprintf("Field %s: %s ", $error->getPropertyPath(), $error->getMessage());
            }

            throw new ResourceValidationException($message);
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('fos_oauth_server_token', [
            'client_id'		=> $paramFetcher->get('client_id'),
            'client_secret'	=> $paramFetcher->get('client_secret'),
            'grant_type'	=> $paramFetcher->get('grant_type'),
            'username'		=> $user->getEmail(),
            'password'		=> $paramFetcher->get('password'),
            'redirect_uri'	=> $paramFetcher->get('redirect_uri')
        ]);
    }
}
