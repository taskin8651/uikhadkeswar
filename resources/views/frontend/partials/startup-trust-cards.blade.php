<div class="startup-recognition-grid trust-us-grid">

  @foreach($startupTrustCards as $card)
    <article class="startup-recognition-card trust-card {{ $card->color_class ?: 'trust-card-red' }}">

      <div class="trust-card-main">

        <div class="startup-recognition-icon trust-card-icon">
          <i class="{{ $card->icon ?: 'bi bi-star-fill' }}"></i>
        </div>

        <div class="trust-card-content">
          <h3>{{ $card->title }}</h3>

          <span class="trust-card-line"></span>

          <p>{{ $card->description }}</p>
        </div>

      </div>

      <div class="trust-card-footer">
        <i class="{{ $card->footer_icon ?: 'bi bi-patch-check-fill' }}"></i>

        <span>{!! $card->footer_text !!}</span>
      </div>

    </article>
  @endforeach

</div>
