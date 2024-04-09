<?php



function resource_collection($resource): array
{
    return json_decode($resource->response()->getContent(), true) ?? [];
}


function availableLanguages(){
    return ['en', 'ar','de'];
}

