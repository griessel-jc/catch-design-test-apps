type ApiResponse<T> = {
  success: boolean;
  data: T;
  message: string;
};

type Customer = {
  id: number;
  first_name: string | null;
  last_name: string | null;
  email: string;
  gender: string;
  ip_address: string;
  company: string | null;
  city: string | null;
  title: string | null;
  website: string | null;
};

type CustomerResponse = {
  customers: Customer[];
  meta: {
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
  };
  links: {
    first: string;
    last: string;
    prev: string | null;
    next: string | null;
  };
};
