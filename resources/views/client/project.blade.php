@extends('client.index')

@section('client')
<section class="content-header">
	<h1>
		Projects
		<small>Control panel</small>
    <div class="input-group input-group-sm pull-right col-xs-3">
      <form action="{{url('client/searchProject')}}" method="get" role="search">
        <div class="input-group">
          <input class="form-control" type="text" placeholder="Search Project.." name="search">
          <span class="input-group-btn">
            <button class="btn btn-info btn-flat" type="submit"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
    </div>
	</h1>
</section>

<section class="content">
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-yellow"><i class="fa fa-file-code-o"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">All Project</span>
				<span class="info-box-number">{{ \App\Project::where('status','!=','N')->count() }}</span>
			</div>
		</div>
	</div>
  <div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-teal"><i class="fa fa-code"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Active Project</span>
				<span class="info-box-number">{{ \App\Project::where('status','=','active')->count() }}</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Completed PJ</span>
				<span class="info-box-number">{{ \App\Project::where('status','=','complete')->count() }}</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="info-box">
			<span class="info-box-icon bg-red"><i class="fa fa-close"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Deadlined PJ</span>
				<span class="info-box-number">{{ \App\Project::where('status','=','deadline')->count() }}</span>
			</div>
		</div>
	</div>
	@foreach ($project as $project)
	<div class="col-lg-4">
    <div class="box box-info">
        <div class="box-header with-border">
					<div class="box-title">
            <span style="font-size: 25px;"><i class="fa fa-folder-open"></i> {{$project->name}}</span>
					</div>
        </div>
        <div class="box-body">
            <span style="font-size: 18px;">Developed by :</span>
            <div class="team-members">
                <a href="{{url('user/'.$project->userid)}}">{{ $project->head }}</a>
            </div>
            <span style="font-size: 18px;">Info about {{$project->name}} :</span>
            <p>
                {{ substr($project->description, 0, 255) }}...
            </p>
            <div>
                <span style="font-size: 18px;">Status of this project : </span>
                <span class="stat-percent" style="font-size: 18px;"> {{$project->complete}}%</span>
                @if ($project->status == "Active")
                  <div class="progress progress-sm active">
  									<div class="progress-bar progress-bar-active progress-bar-striped" role="progressbar" aria-valuenow="{{$project->complete}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->complete}}%"></div>
                  </div>
                @elseif($project->status == "Complete")
                  <div class="progress progress-sm">
                    <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="{{$project->complete}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->complete}}%"></div>
                  </div>
                @elseif($project->status == "Deadline")
                  <div class="progress progress-sm active">
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="{{$project->complete}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$project->complete}}%"></div>
                  </div>
                @endif
            </div>
            <div class="row m-t-sm">
                <div class="col-sm-12 text-center">
                    <div class="font-bold">BUDGET</div>
                    Rp. {{$project->budget}} <i class="fa fa-level-up text-navy"></i>
                </div>
            </div>
        </div>
    </div>
  </div>
	@endforeach
</div>
</section>

@endsection
