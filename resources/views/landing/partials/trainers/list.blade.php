@php
    // Ganti data static dengan data dari database
    $trainers = app(\App\Http\Controllers\TrainerController::class)->getTrainersForFrontend();
@endphp

<section class="bg-neutral-900 py-24">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 auto-rows-fr">
            @foreach ($trainers as $trainer)
                <x-trainer-card :trainer="$trainer" />
            @endforeach
        </div>
    </div>
</section>
