<?php


namespace App\MyDataTable;


trait MDT_Query
{

    function MDT_Query_method($model , $pathView  , $softDelete = false  , $data = []){


        $withRelationship = array_key_exists('with_RS' , $data) ? $data['with_RS'] : [];
        $withCount        = array_key_exists('with_count' , $data) ? $data['with_count'] :[];
        $sendDataWithView = array_key_exists('with' , $data) ? $data['with'] : [];
        $columnsGet       = array_key_exists('select' , $data) ? $data['select'] : '*';
        $startCount       = array_key_exists('count' , $data) ? $data['count'] : 10;
        $orderBy          = array_key_exists('orderBy' , $data) ? $data['orderBy'] :['id' , 'desc'];
        $condition        = array_key_exists('condition' , $data) ? $data['condition'] : null;
        $condition2       = array_key_exists('condition2' , $data) ? $data['condition2'] : null;
        $filter           = array_key_exists('filter' , $data) ? $data['filter'] : null;

        $modelDB = $model;

        if (is_array($condition)){ // create query where

            $conditionName = $condition[0];
            unset($condition[0]);
        }
        if (is_array($condition2)){ // create query where

            $condition2Name = $condition2[0];
            unset($condition2[0]);
        }

        request('filter') ? $filter = request('filter') : '';

        if (is_array($filter)) {

            $filterName = $filter[0];
            unset($filter[0]);
        }

        if (\request()->ajax() && \request()->has('myDataTableAjax')) {

            $modelDB = $modelDB::with($withRelationship)
                ->withCount($withCount);

            $softDelete ? $modelDB->onlyTrashed() :'';

            isset($conditionName) ? $modelDB->$conditionName(...$condition) : '';
            isset($condition2Name) ? $modelDB->$condition2Name(...$condition2) : '';
            isset($filterName) ? $modelDB->$filterName(...$filter) : '';

            request('search')
                ? $modelDB->where( \request( 'searchColumn' ) , "LIKE" , "%" . \request( 'search' ) . "%" )
                : '';


            $modelDB->orderby( \request( 'orderColumn' ) , \request( 'orderBy' ) );

            if ( \request( 'orderColumn' ) != 'id' && \request( 'orderBy' ) != 'desc') {

                $modelDB->orderby( 'id'  , 'desc' );
            }

            $dataTable = $modelDB->paginate( \request( 'count' )  , $columnsGet);

            $btn = $dataTable->links()->render();

            return response(['dataDB' => $dataTable, 'btn' => $btn]);

        }



        session()->flash('data-session' , [
            'count' => $startCount ,
            'orderBy' => $orderBy[1] ,
            'orderColumn' => $orderBy[0]
        ]);

        return view($pathView)->with($sendDataWithView);

    }

}
