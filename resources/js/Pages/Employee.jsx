import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import NavLink from '@/Components/NavLink';
import { Head } from '@inertiajs/react';

export default function Menu({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            
            header=
            {<h2 className="font-semibold text-xl text-gray-800 leading-tight">Staff</h2>}
            
            
        >
            <Head title="Care Connect" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">rtwbvrtreiunqocie</div>
                    </div>
                </div>
            </div>

            <div className="py-2">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">rtwbvrtreiunqocie</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
