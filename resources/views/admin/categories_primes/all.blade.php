@extends('layouts.main')

@section('title', $title.' | ' . config('app.name'))
@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <ul>
            <li>
                <a href="/">Dashboard</a>
            </li>
            <li>{{$title}}</li>
        </ul>
    </div>

    @if (session()->has('message'))
    <div class="ui-alart-box">
        <div class="icon-color-alart">
            <div class="alert icon-alart bg-light-green2" role="alert">
                <i class="far fa-hand-point-right bg-light-green3"></i>
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif

    @if (session()->has('supprimer'))
    <div class="ui-alart-box">
        <div class="icon-color-alart">
            <div class="alert icon-alart bg-pink2" role="alert">
                <i class="fas fa-times bg-pink3"></i>
                {{session()->get('supprimer')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif
    <!-- Row -->
    <div class="modal-box pull-right">
        <button type="button" class="modal-trigger" data-toggle="modal" data-target="#add-section">Ajouter Une Section</button>
    </div>
    <!-- Teacher Payment Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Toutes les Section</h3>
                </div>
            </div>

            <table class="table data-table text-nowrap">
                <thead>
                    <th>#</th>
                    <th>Catégorie</th>
                    <th>Section</th>
                    <th>Statut</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sections as $section )
                    <tr>
                        <td>{{$section->section_id}}</td>
                         <td>{{$section->category}}</td>
                        <td><a href="{{route('sections.show',$section->section_id)}}">{{$section->section_name}}</a></td>
                        @if($section->status =='1')
                        <td class="text-success">Actif </td>
                        @else
                        <td class="text-danger">Désactiver</td>
                        @endif
                        <td>
                            <form action="{{ route('sections.destroy', $section->section_id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-xs btn-danger fa fa-trash"
                                    onclick="return confirm('Êtes-vous sûr de vouloir faire cette action ?')">
                                    Desactiver
                                </button>
                            </form>
                            <a href="{{route('sections.edit',$section->section_id)}}"
                                class=" btn btn-xs btn-success fas fa-edit" title="Modifier">Modifier</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Teacher Payment Area End Here -->
    <!-- Footer Area Start Here -->
    @include('layouts.footer')
    <!-- Footer Area End Here -->
</div>

@include('admin.sections.modals.create')
@endsection