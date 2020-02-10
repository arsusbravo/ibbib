@extends('layouts.front')

@section('content')
    <div class="tr-post-job page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <form method="POST" action="{{ url('client/project'. (isset($project) ? '/'.$project->id: '')) }}">
                        @csrf
                        <div class="short-info code-edit-small">
                            <div class="section">
                                <span class="tr-title">Short Info</span>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>{{ __('Title for your project') }}</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="title" placeholder="{{ __('Title') }}" value="{{ isset($project) ? $project->title: old('title') }}">
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>Translation proviciency:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select name="from" class="form-control select2">
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}"{!! isset($project) && $language->id == $project->skill->languageSkill->from ? ' selected="selected"': null !!}>{!! $language->name !!}</option>
                                            @endforeach
                                        </select>
                                        @error('from')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-1 text-center">{{ __('to') }}</div>
                                    <div class="col-sm-4">
                                        <select name="to" class="form-control select2">
                                            @foreach ($languages as $language)
                                                <option value="{{ $language->id }}"{!! isset($project) && $language->id == $project->skill->languageSkill->to ? ' selected="selected"': null !!}>{!! $language->name !!}</option>
                                            @endforeach
                                        </select>
                                        @error('to')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>	
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>{{ __('Categories') }}:</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <select name="categories[]" class="form-control select2" data-placeholder="{{ __('Choose categories') }}" multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"{!! isset($project) && in_array($category->id, $project->categories()->pluck('id')->toArray()) ? ' selected': '' !!}>{!! $category->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>	
                                <div class="row">
                                    <div class="col-sm-3">
                                        <label>{{ __('Deadline') }}</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="calendar">
                                            <input type="date" name="deadline" class="form-control" value="{{ isset($project) ? \Carbon\Carbon::parse($project->deadline)->format('Y-m-d'): \Carbon\Carbon::today()->addDays(6)->format('Y-m-d') }}">
                                       </div>
                                       @error('deadline')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    </div>
                                </div><!-- /.row -->											
                            </div>
                        </div>
                        <div class="job-description section">
                            <span class="tr-title">{{ __('Description') }}</span>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>{{ __('Translation Summary') }}</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="10" name="content" placeholder="{{ __('Description about the translation project') }}">{!! isset($project) ? $project->content: old('content') !!}</textarea>
                                    @error('content')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div><!-- /.row -->				
                        </div><!-- /.job-description -->
                        <div class="section agreement">
                            @if (!isset($id) || isset($id) && !$id)
                                <label for="send">
                                    <input type="checkbox" name="accord" id="send" value="1">
                                    You agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Trade to find a genuine buyer. 
                                    @error('accord')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </label>
                            @endif
                            <div class="buttons">
                                <button type="submit" class="btn btn-primary">{{ !isset($id) || isset($id) && !$id ? __('Post Your Translation Project'): __('Update Your Translation Project') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="section quick-rules">
                        <span class="tr-title">Quick Rules</span>
                        <p>Posting an ad on <a href="#">Seeker.com</a> is free! However, all post must follow our rules:</p>
                        <ul class="tr-list">
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                            <li>Do not put your email or phone numbers in the title or description.</li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
@endsection