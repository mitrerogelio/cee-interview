<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interview Project</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('contact-form');

            form.addEventListener('submit', async event => {
                event.preventDefault();

                const formData = new FormData(form);

                try {
                    const response = await axios.post('/contacts', formData);
                    console.log("Form Submission:");
                    console.log(response.data);
                    window.location.reload();
                } catch (error) {
                    console.error("Error submitting form:", error);
                }
            });

            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', event => {
                    event.preventDefault();
                    const contactId = button.getAttribute('data-contact-id');
                    deleteContact(contactId);
                });
            });
        });

        async function deleteContact(contactId) {
            try {
                const response = await axios.delete(`/contacts/${contactId}`);
                console.log("Contact deleted successfully:", response.data);
                window.location.reload();
            } catch (error) {
                console.error("Error deleting contact:", error);
            }
        }
    </script>
</head>

<body>

<section class="w-3/4 bg-gray-100 m-auto mb-12">
    <h2 class="text-base font-semibold leading-7 text-gray-900 mb-6">Current Contacts:</h2>
    <section class="flex w-full justify-evenly items-center">
        @foreach($contacts as $contact)
            <article class="border-2">
                <p class="font-bold">{{$contact->first_name}} {{$contact->last_name}}</p>
                <p>{{$contact->email}}</p>
                <p>{{$contact->street}}, {{$contact->city}}, {{$contact->state}}, {{$contact->zip}}</p>

                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                            data-contact-id="{{$contact->id}}"
                            class="delete-btn rounded bg-red-400 mt-3 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-800">
                        Delete
                    </button>
                </form>
            </article>
        @endforeach
    </section>
</section>

<form id="contact-form" class="w-3/4 m-auto" action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="space-y-12">
        <div class="border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Contact Form</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600"></p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                    <div class="mt-2">
                        <input type="text" name="first_name" id="first-name" autocomplete="given-name"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                    <div class="mt-2">
                        <input type="text" name="last_name" id="last-name" autocomplete="family-name"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
            </div>
            <div class="col-span-full">
                <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street
                    address</label>
                <div class="mt-2">
                    <input type="text" name="street" id="street-address" autocomplete="street-address"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2 sm:col-start-1">
                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                <div class="mt-2">
                    <input type="text" name="city" id="city" autocomplete="address-level2"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State /
                    Province</label>
                <div class="mt-2">
                    <input type="text" name="state" id="state" autocomplete="address-level1"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
                <label for="zip" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal
                    code</label>
                <div class="mt-2">
                    <input type="text" name="zip" id="zip" autocomplete="zip"
                           class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3 flex items-center justify-end gap-x-6">
        <button type="submit"
                class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
            Save
        </button>
    </div>
</form>

</body>
</html>
