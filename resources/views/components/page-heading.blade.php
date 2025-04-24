<div class="relative mb-4 w-full" :pageHeading="$pageHeading" :pageDesc="$pageDesc">
  <flux:heading size="xl" level="1">{{ $pageHeading ?? "Page Heading" }}</flux:heading>
  <flux:subheading size="lg" class="mb-6">{{ $pageDesc ?? "Page Description" }}</flux:subheading>
  <flux:separator variant="subtle"></flux:separator>

</div>