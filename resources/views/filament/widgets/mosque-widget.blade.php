<!-- resources/views/filament/widgets/mosque-widget.blade.php -->

<div class="p-4 border rounded-md shadow-md bg-white">
    <h3 class="text-xl font-bold mb-4">Mosque Information</h3>
    <p><strong>Masjid Name:</strong> {{ $mosque->masjidname }}</p>
    <p><strong>City:</strong> {{ $mosque->city }}</p>
    <p><strong>Address:</strong> {{ $mosque->address }}</p>
    <p><strong>Fajr Time:</strong> {{ $mosque->fajr }}</p>
    <p><strong>Juma Time:</strong> {{ $mosque->juma }}</p>
    <!-- You can display other fields here as needed -->
</div>