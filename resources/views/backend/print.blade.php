<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Shipping Label</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            @page {
                size: 100mm 150mm;
                margin: 0;
            }
            body {
                padding: 0;
                margin: 0;
                width: 100mm;
                height: 150mm;
            }
            .label {
                width: 100mm;
                height: 150mm;
                border: 1px dashed #ccc !important;
            }
            .no-print {
                display: none !important;
            }
        }
        .barcode {
            letter-spacing: 3px;
            font-family: 'Libre Barcode 39', cursive;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+39&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-2 no-print">
        <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Print Label</button>
    </div>

    <!-- Courier Label - Actual size for printing (100x150mm) -->
    <div class="label bg-white p-2 mx-auto border border-gray-300 overflow-hidden">
        <!-- Company Header -->
        <div class="text-center mb-1 border-b border-gray-300 pb-1">
            <h1 class="text-sm font-bold">Swift COURIERS </h1>
            <p class="text-[8px]">24/7 Logistics Support • www.Swiftcouriers.com</p>
        </div>

        <!-- Tracking Info -->
        <div class="flex justify-between items-center mb-1 p-1 bg-yellow-50">
            <div>
                <p class="text-[8px] font-semibold">TRACKING #</p>
                <p class="text-xs font-bold">{{ $courier->order_id }}</p>
            </div>
            <div class="text-right">
                <p class="text-[8px] font-semibold">DATE</p>
                <p class="text-xs">{{ date('d-M-Y', strtotime($courier->created_at)) }}</p>
            </div>
        </div>

        <!-- From/To -->
        <div class="grid grid-cols-2 gap-1 mb-1 text-[8px]">
            <!-- From -->
            <div class="border border-gray-300 p-1">
                <div class="bg-black text-white px-1 mb-1 text-center font-bold">SHIP FROM</div>
                <p><strong>{{ $courier->name }}</strong></p>
                <p>{{ $courier->address }}</p>
                <p>{{ $courier->destination }}</p>
                <p class="mt-1"><strong>PH:</strong> {{ $courier->phone ?? 'N/A' }}</p>
            </div>

            <!-- To -->
            <div class="border border-gray-300 p-1">
                <div class="bg-black text-white px-1 mb-1 text-center font-bold">SHIP TO</div>
                <p><strong>{{ $courier->r_name }}</strong></p>
                <p>{{ $courier->r_address }}</p>
                <p class="mt-1"><strong>PH:</strong> {{ $courier->r_phone }}</p>
                @if($courier->r_email)
                <p><strong>Email:</strong> {{ $courier->r_email }}</p>
                @endif
            </div>
        </div>

        <!-- Package Info -->
        <div class="grid grid-cols-3 gap-1 mb-1 text-[8px]">
            <div class="border border-gray-300 p-1 text-center">
                <p class="font-bold">WEIGHT</p>
                <p>{{ $courier->weight }} kg</p>
            </div>
            <div class="border border-gray-300 p-1 text-center">
                <p class="font-bold">DIMENSIONS</p>
                <p>{{ $courier->dimension }}</p>
            </div>
            <div class="border border-gray-300 p-1 text-center">
                <p class="font-bold">TYPE</p>
                <p>{{ $courier->package }}</p>
            </div>
        </div>

        <!-- Barcode -->
        <div class="text-center mt-1 mb-1">
            <div class="barcode text-2xl">*{{ $courier->order_id }}*</div>
            <p class="text-[8px] mt-[-4px]">{{ $courier->order_id }}</p>
        </div>

        <!-- Handling Instructions -->
        <div class="border border-gray-300 p-1 text-[8px] mb-1">
            <p class="font-bold">HANDLING INSTRUCTIONS:</p>
            <p>{{ $courier->msg ?? 'FRAGILE • THIS SIDE UP • DO NOT BEND' }}</p>
        </div>

        <!-- Status and Footer -->
        <div class="text-center text-[6px]">
            <p class="font-bold">STATUS: {{ $courier->status }}</p>
            <p class="mt-1">SCAN THIS BARCODE AT EACH CHECKPOINT</p>
            <p>IF UNDELIVERABLE, RETURN TO: swift Couriers Ltd, Bijit Tole,New road</p>
        </div>

        <!-- Routing Info -->
        <div class="absolute bottom-0 right-0 rotate-90 origin-left text-[6px] mr-[-55px] mt-[-10px]">
            <p><strong>CREATED:</strong> {{ date('d-M-Y H:i', strtotime($courier->created_at)) }}</p>
            @if($courier->updated_at != $courier->created_at)
            <p><strong>UPDATED:</strong> {{ date('d-M-Y H:i', strtotime($courier->updated_at)) }}</p>
            @endif
        </div>
    </div>
</body>
</html>