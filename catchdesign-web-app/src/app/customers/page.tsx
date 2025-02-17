import { Button } from "@/components/ui/button";
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from "@/components/ui/table";
import { fetchApi } from "@/lib/api";
import { ChevronLeft, ChevronRight } from "lucide-react";
import Link from "next/link";

export default async function Customers(props: {
  searchParams: Promise<{ page?: string }>;
}) {
  const searchParams = await props.searchParams;
  const currentPage = Number(searchParams.page) || 1;
  const response = await fetchApi<CustomerResponse>(
    `/customers?page=${currentPage}`
  );
  if (!response.success || !response.data) {
    return (
      <div className="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex min-w-96 h-28 m-auto justify-center">
        <div className="text-red-500 flex mx-auto font-bold">
          API Failed: {response.message}
        </div>
      </div>
    );
  }
  const customers = response.data.customers;
  const headers = Object.keys(customers[0]).map((key) => {
    if (key === "id") {
      return "ID";
    }
    key = key.replace("_", " ");
    return key.charAt(0).toUpperCase() + key.slice(1);
  });

  const { last_page: lastPage } = response.data.meta;
  return (
    <div className="flex flex-col items-center">
      <h1>Customers table</h1>
      <div className="w-full max-w-7xl mx-auto p-4 space-y-4">
        <Table>
          <TableCaption>A list of your recent customers.</TableCaption>
          <TableHeader>
            <TableRow>
              {headers.map((header) => (
                <TableHead key={header} className="w-24">
                  {header}
                </TableHead>
              ))}
            </TableRow>
          </TableHeader>
          <TableBody>
            {customers.map((customer) => (
              <TableRow key={customer.id}>
                {Object.values(customer).map((value, index) => (
                  <TableCell key={`${customer.id}-${index}`}>{value}</TableCell>
                ))}
              </TableRow>
            ))}
          </TableBody>
        </Table>

        <div className="flex items-center justify-between space-x-2">
          <Button
            variant="outline"
            size="sm"
            asChild
            aria-disabled={currentPage === 1}
            className={
              currentPage === 1 ? "pointer-events-none opacity-50" : ""
            }
          >
            <Link href={`?page=${currentPage - 1}`}>
              <ChevronLeft className="h-4 w-4 mr-2" />
              Previous
            </Link>
          </Button>
          <span className="text-sm">
            Page {currentPage} of {lastPage}
          </span>
          <Button
            variant="outline"
            size="sm"
            asChild
            aria-disabled={currentPage === lastPage}
            className={
              currentPage === lastPage ? "pointer-events-none opacity-50" : ""
            }
          >
            <Link href={`?page=${currentPage + 1}`}>
              Next
              <ChevronRight className="h-4 w-4 ml-2" />
            </Link>
          </Button>
        </div>
      </div>
    </div>
  );
}
