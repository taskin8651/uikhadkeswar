<div class="kpt-grid">

  @foreach($keyPointTrustCards as $index => $card)
    <article class="kpt-card {{ $card->color_class ?: 'kpt-card-red' }}"
             data-aos="fade-up"
             data-aos-delay="{{ 80 + ($index * 50) }}">

      <div class="kpt-card-body">

        <div class="kpt-card-icon">
          <i class="{{ $card->icon ?: 'bi bi-star-fill' }}"></i>
        </div>

        <div class="kpt-card-content">
          <h3>{{ $card->title }}</h3>
          <span class="kpt-card-line"></span>

          <p>{{ $card->description }}</p>
        </div>

      </div>

      <div class="kpt-card-footer">
        <i class="{{ $card->footer_icon ?: 'bi bi-patch-check-fill' }}"></i>

        <span>{!! $card->footer_text !!}</span>
      </div>

    </article>
  @endforeach

</div>
