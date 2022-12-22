@extends('layouts.app')

@section('title', 'Tech4You')

@section('content')

<nav class="path" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb" style="margin: 0px 100px">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">ManageFAQs</li>
    </ol>
</nav>

<style>
    .contentEditable:read-write:focus {
        outline: none;
    }
</style>



<div class="mainDiv" style="margin: 0px 100px;">
    <h1>Manage FAQs...</h1>
    <div class="data_div">
        @foreach($allFAQs as $faq)
            <div class="card userCard" style="margin-top: 30px; display: flex;" id="faqForm{{ $faq->id }}">
                <div class="card-header">
                    <span class="contentEditable" id="faq_question{{ $faq->id }}" contentEditable="true">{{ $faq->question }}</span>
                </div>
                <div class="card_body">
                    <div class="card-body" style="display: inline-block;">
                        <span class="card-text contentEditable" id="faq_answer{{ $faq->id }}" contentEditable="true">{{ $faq->answer }}</span>    
                    </div>
                    <div class="div_buttons" style="display: inline-block; float: right; align-items: center;">
                        <a class="btn" onClick="updateFAQ({{ $faq->id }})" style="text-align: center; justify-content: center;">
                            <svg fill="none" height="40" width="40" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 13V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V13" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 15V3M12 3L8.5 6.5M12 3L15.5 6.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a class="btn" id="userSearch" onClick="deleteFAQ({{ $faq->id }})" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- <div style="margin: 0px 100px">
    <h1>All FAQs...</h1>

    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Question</th>
                <th scope="col" style="text-align: center">Answer</th>
                <th colspan=2 style="text-align: center">Options</th>
            </tr>
        </thead>
        <tbody>
            <tr id="addNewProductForm">
                <th colspan=8 style="text-align: center;">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div id="rowAddFAQ">
                                    <div>
                                        <label for="prodDescription">Question: </label>
                                        <textarea id="newQuestion" name="newQuestion" rows="4" cols="50"></textarea>
                                    </div>
                                    <div>
                                        <label for="prodDescription">Answer: </label>
                                        <textarea id="newAnswer" name="newAnswer" rows="4" cols="50"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit" style="margin-top: 15px">
                                        <div class="form-group">
                                            <a onClick="addFAQ()" type="submit" class="btn btn-success" value="Create FAQ">Create FAQ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            @foreach($allFAQs as $faq)
                <tr name="faq_row" style="text-align: center; justify-content: center;" id="faqForm{{ $faq->id }}">
                    <th scope="row" style="text-align: center; justify-content: center;">{{ $faq->id }}</th>
                    <td style="text-align: center; justify-content: center;"><input name="faq_question" style="all: unset;" value="{{ $faq->question }}" id="faq_question{{ $faq->id }}"></td>
                    <td style="text-align: center; justify-content: center;"><input name="faq_answer" style="all: unset" value="{{ $faq->answer }}" id="faq_answer{{ $faq->id }}"></input></td>
                    <td>
                        <a class="btn" onClick="deleteFAQ({{ $faq->id }})" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" color="blue">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a class="btn" onClick="updateFAQ({{ $faq->id }})" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> -->

@endsection