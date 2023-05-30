@extends('layouts.app')

@section('body')

    <section id="contact-grid">
        <div id="contacts-buttons" class="float-right">
            <a href="{{ route('contact.create') }}">Add Contact</a>
        </div>
        <div id="search-container" class="mb-3">
            <input type="text" id="search-input" class="form-control w-fit" placeholder="Search">
        </div>
        <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Company</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @if (!isset($contacts) || count($contacts) <= 0)
                <tr>
                    <td class="grid-no-data" colspan="5">No records available</td>
                </tr>
                @else
                    @foreach ($contacts as $item)
                        <tr>
                            <td scope="row">{{$item->name}}</td>
                            <td>{{$item->company}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('contact.edit', encrypt($item->id)) }}" class="mr-2">Edit</a>
                                    <a href="/" class="delete-contact" data-id="{{encrypt($item->id)}}">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <div id="pagination-container" class="d-flex justify-content-center mt-3">
        </div>
    </section>
@endsection