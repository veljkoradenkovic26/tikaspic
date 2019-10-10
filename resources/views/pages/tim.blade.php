@extends('layouts.front')

@section('title')
Tim
@endsection

@section('center')




        <div class="container">

                <div class="kolona22 kolona23">
                    <div class="row">
                  

                        @isset($tim)
                      @foreach($tim as $t)
                       
                      <div class="kolona45 kolona46" style="height:250px; margin-bottom: 46px">

                                   <div class="post-thumb" style="padding-top: 17px">
                                       <a href="{{ asset($t->putanja) }}" class="fancybox" data-fancybox-group="gallery1" ><img src="{{ asset('/').$t->putanja }}" alt="{{ $t->alt }}" width="400px" height="250px" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px"></a>
                                 <div class="project_title" style="margin-bottom: 30px">
                        <h5><b>{{ $t->naslov }}</b></h5>
                
            </div>
                                </div>

                        </div>
                        
                       @endforeach


                        @endisset
                           </div>
                    @isset($tim)
                    <div style="margin-bottom: 30px;">
                        {{ $tim->links() }}
                    </div>
                        @endisset
                </div>

        </div>



@endsection

@section('appendJS')
@parent 

<script type="text/javascript" src="{{ asset('/') }}js/fancybox/lib/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="{{ asset('/') }}js/fancybox/source/jquery.fancybox.js"></script>
	<script language="javascript">
			$(document).ready(function(){
				$('.fancybox').fancybox();
			});
		</script>
@endsection
