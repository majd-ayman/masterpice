 @include('doctor.apps.header')

 <!-- Reviews -->
 <div class="col-md-10 mt-4">
     <h4 class="mb-4" style="text-align: center">Reviews </h4>
     @foreach ($reviews as $review)
         <div class="feedback-item p-4 mb-3 border rounded shadow-sm">
             <div class="d-flex justify-content-between align-items-center mb-3">
                 <strong class="h5">Reviewed by: {{ $review->user->name }}</strong>
                 <div class="star-rating">
                     @for ($i = 1; $i <= 5; $i++)
                         <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-muted' }}"></i>
                     @endfor
                 </div>
             </div>
             <p class="mb-2">{{ $review->comment }}</p>
             <small class="text-muted">Reviewed on: {{ $review->created_at->format('M d, Y') }}</small>
         </div>
     @endforeach
 </div>
 @include('doctor.apps.footer')
