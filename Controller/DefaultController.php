<?php

namespace Shandra\WeatlasApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function searchAction(Request $request)
    {
        $term = $request->get('term');
        /* @var $api WeatlasAPI */
        $api = $this->get('shandra_weatlas_api');
        $result = $api->search($term);
        return new JsonResponse($result);
    }
}
