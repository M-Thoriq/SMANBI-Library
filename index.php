<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMANBI Library</title>
    <link rel="stylesheet" href="./public/css/output.css">
</head>
<body>
    <section class="bg-default grid content-center">

        <div class="mx-auto grid place-content-center place-items-center my-8">
            <div class="w-32 h-32 p-4 m-auto bg-slate-50 rounded-full">
                <img src="./public/images/logo.png" class="w-20 m-auto" alt="">
            </div>
        </div>
        <form action="" class="w-full max-w-5xl mx-auto">
            <div class="flex">    
                <div class="relative w-full">
                    <input type="search" id="book_search" class="searchBar px-7 py-6 " placeholder="Cari judul buku" required>
                    <button type="submit" class="absolute top-0 -right-6 h-full px-8 py-7 text-sm font-medium text-white bg-blue-700 rounded-r-full border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>


    </section>
</body>
</html>