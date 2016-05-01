@extends('layouts.app')

@section('content')
    <div class="pagelab listview">
        <div class="container">
            <div class="listview-heading">
                <div class="pull-left">
                <div class="listview-heading__title title">Edit Transaction</div>
                <div>Transaction UUID: {{$transaction->uuid}}</div>
                <div>Account: {{$transaction->account->name}}</div>
                </div>

                <div class="pull-right">
                    <a class="btn btn-danger" href="{{route('transactions.index')}}">
                        <i class="fa fa-backward"></i> Back</a>
                </div>

            </div>

            <div class="listview-body">
                <div class="container">
                    <form class="form-create form-horizontal" accept-charset="UTF-8"
                          action="{{route('transactions.store')}}" method="post" role="form">

                        {{csrf_field()}}

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : ''}}">
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-9">
                                <div class="radio-type-control">
                                    <input id="rdoInput" type="radio" name="type" value="0" {{$transaction->type == 'input' ? 'checked' : ''}} >
                                    <label for="rdoInput">Input</label>
                                </div>
                                <div class="radio-type-control">
                                    <input id="rdoOutput" type="radio" name="type" value="1" {{$transaction->type == 'output' ? 'checked' : ''}}>
                                    <label for="rdoOutput">Output</label>
                                </div>

                                @if($errors->has('type'))
                                    <span class="help-block">
                                    <strong>{{$errors->first('type')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : ''}}">
                            <label class="col-sm-3 control-label" for="txtAmount">Amount</label>
                            <div class="col-sm-9">
                                <input id="txtAmount" type="text" class="form-control" name="amount"
                                       value="{{$transaction->amount}}"
                                       placeholder="0.00">
                                @if($errors->has('amount'))
                                    <span class="help-block">
                                    <strong>{{$errors->first('amount')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            <label class="col-sm-3 control-label" for="txtDescription">Description</label>
                            <div class="col-sm-9">
                                <input id="txtDescription" type="text" class="form-control" name="description"
                                       value="{{$transaction->description}}" placeholder="Write a description here">
                                @if($errors->has('description'))
                                    <span class="help-block">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <button class="btn btn-success pull-right" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection