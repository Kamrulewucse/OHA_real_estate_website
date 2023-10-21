<?php


function getPortfolios($categoryId){

    return \App\Models\Portfolio::where('category_id',$categoryId)->get();
}


