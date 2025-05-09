{{-- <div class="relative mb-4 w-full" :pageHeading="$pageHeading" :pageDesc="$pageDesc"> --}}
  {{-- <flux:heading size="xl" level="1">{{ $pageHeading ?? "Page Heading" }}</flux:heading>
  <flux:subheading size="lg" class="mb-6">{{ $pageDesc ?? "Page Description" }}</flux:subheading>
  <flux:separator variant="subtle"></flux:separator> --}}
<div class="mb-8 animate-fade-in" :pageHeading="$pageHeading" :pageDesc="$pageDesc">
      <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-100 transition-colors duration-300">
        {{ $pageHeading ?? "Page Heading" }}
      </h1>
      <p class="mt-2 text-slate-500 dark:text-slate-400 transition-colors duration-300">
        {{ $pageDesc ?? "Page Description" }}
      </p>
          <!-- Add this to your CSS -->
    <style>
      @keyframes fadeIn {
          from {
              opacity: 0;
              transform: translateY(-5px);
          }

          to {
              opacity: 1;
              transform: translateY(0);
          }
      }

      @keyframes enter {
          from {
              opacity: 0;
              transform: translateX(-10px);
          }

          to {
              opacity: 1;
              transform: translateX(0);
          }
      }

      .animate-fade-in {
          animation: fadeIn 0.4s ease-out forwards;
      }

      .animate-enter {
          animation: enter 0.3s ease-out forwards;
      }
  </style>
</div>
{{-- </div> --}}